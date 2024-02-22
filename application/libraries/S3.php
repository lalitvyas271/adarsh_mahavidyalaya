<?php 
// Include the SDK using the composer autoloader
require 'vendor/autoload.php';

Class S3{
    private $ci;
    private $s3;
    public function __construct(){
        // Get the CodeIgniter reference
        $this->ci = &get_instance();
        
        // Include the SDK using the composer autoloader
        require 'vendor/autoload.php';
        
        $this->s3 = new Aws\S3\S3Client([
            'region'  => 'eu-west-2',
            'version' => 'latest',
            'credentials' => [
                'key'    => AWS_A_KEY,
                'secret' => AWS_S_KEY,
            ]
        ]);
    }

	function get_client()
	{
		return $this->s3;
	}

	function get_file_path($name = '', $bucket = BUCKET_NAME)
	{
//    	return $name
	}

    function upload_by_file($name = '', $path = FALSE, $bucket = BUCKET_NAME){
        if(!$name || !$path){
            return false;
        }
        $result = $this->s3->putObject([
            'Bucket' => $bucket,
            'Key'    => $name,
            'SourceFile' => $path // -- use this if you want to upload a file from a local location
        ]);

       return $result['ObjectURL'];
    }


}
