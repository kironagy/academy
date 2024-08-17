<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ProcessVideoUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $videoPath;

    /**
     * Create a new job instance.
     */
    public function __construct($videoPath)
    {
        $this->videoPath = $videoPath;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Storage::disk('public')->move($this->videoPath, 'processed/'.$this->videoPath);

    }
}
