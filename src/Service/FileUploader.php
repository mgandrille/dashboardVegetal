<?php

namespace App\Service;

use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class FileUploader {

    private $targetDirectory;
    private $slugger;

    public function __construct($targetDirectory, SluggerInterface $sluggerInterface){

        $this->targetDirectory = $targetDirectory;
        $this->slugger = $sluggerInterface;
    }

    public function upload(UploadedFile $file){
        
        $originalFilename  = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safePictureName = $this->slugger->slug($originalFilename );
        $newPictureName = $safePictureName.'-'.uniqid().'.'.$file->guessExtension();

        try{
            $file->move(

                $this->getTargetDirectory(),
                $newPictureName
            );
        }catch (FileException $e){
            dd($e);
        }

        return $newPictureName;
    }

    public function getTargetDirectory(){

        return $this->targetDirectory;
    }
}