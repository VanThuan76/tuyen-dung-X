<?php

namespace App\Mail;

use App\Models\Job;
use App\Models\JobRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var JobRequest
     */
    private $jobRequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(JobRequest $jobRequest)
    {
        //
        $this->jobRequest = $jobRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $job = Job::where("id", $this->jobRequest->job_id)->first();
        return $this
            ->subject('Mail Apply')
            ->markdown('mail.apply-mail', [
                'name' => $job->title,
                'address' => $job->address
            ]);
    }
}