<?php

namespace App\Jobs;

use App\Models\Config;
use App\Models\Disc;
use App\Models\Purchase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;

class PurchaseDispatch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $purchase;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $purchase = $this->purchase;

        $cache_waitlist = 'disc_waitlist_'.$purchase->disc_id;

        $config_key = 'config_waitlist_'.$purchase->disc_id;

        $cache_amount = 0;

        if($purchase->amount > 0)
        {
            if(!Redis::exists($cache_waitlist)) {
                $disc = Disc::find($purchase->disc_id);
                
                if($disc->amount > 0)
                {
                    $disc->amount -= $purchase->amount;
                    $disc->save();
                } else {
                    Redis::set($cache_waitlist, 1);
                }
            }
            elseif(Redis::get($cache_waitlist))
            {
                $validade_cache_key = Redis::exists($config_key);

                if(!$validade_cache_key) {
                    $config = Config::where('disc_id', $purchase->disc_id)->first();
                    if($config) {
                        Redis::set($config_key, $config->amount);
                    } else {
                        throw new \Illuminate\Http\Exceptions\HttpResponseException(response()->json([
                            'message' => 'Try again later'
                        ], 404));
                    }
                } elseif ($validade_cache_key) {
                    $cache_amount = Redis::get($config_key);
                    
                    if($cache_amount > 1) {
                        $cache_amount -= 1;
                        $cache_amount = $cache_amount;
                        Redis::set($config_key,$cache_amount);
                        $purchase->waitlist = true;
                        $purchase->save();
                    } elseif($cache_amount == 1) {
                        Redis::del($config_key);
                        $purchase->waitlist = true;
                        $purchase->save();
                        Config::where('disc_id', $purchase->disc_id)->first()->delete();
                    }
                }
            }
        }
    }
}
