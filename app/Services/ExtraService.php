<?php

namespace App\Services;

use App;

class ExtraService
{
    /**
     * Upload an image to AWS S3
     * @param arary $data
     * @return string url
     */
    public function uploadImage($data)
    {
        $image = $data['image'];
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $filetype = $image->getClientOriginalExtension();

        $s3 = App::make('aws')->createClient('s3');
        $bucket = 'combibmark';
        $result = $s3->putObject([
            'Bucket' => $bucket,
            'Key' => $data['type'] . '/' . $filename,
            'Body' => file_get_contents($image),
            'ContentType' => 'image/' . $filetype,
            'ACL' => 'public-read'
        ]);

        return $result['ObjectURL'];
    }

    /**
     * Upload a design file to AWS S3
     * @param arary $data
     * @return string url
     */
    public function uploadDesignFile($data)
    {
        $file = $data['file'];
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        $s3 = App::make('aws')->createClient('s3');
        $bucket = 'combibmark';
        $result = $s3->putObject([
            'Bucket' => $bucket,
            'Key' => 'design/' . $filename,
            'Body' => file_get_contents($file),
            'ACL' => 'public-read'
        ]);

        return $result['ObjectURL'];
    }
}
