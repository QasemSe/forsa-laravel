<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class expiredPostDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Chnage status for the expired posts date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $post = Post::whereDate('expire_date', now()->format('Y-m-d'))->get();
        $post = $post->each(function ($q) {
            $q->status = 0;
            $q->save();
        });
        Log::info("Success To Change Status");
    }
}
