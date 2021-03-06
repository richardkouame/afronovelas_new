<?php


namespace App\Service;


use Cocur\Slugify\Slugify;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use function PHPUnit\Framework\isEmpty;

class FileUploader
{
    private $targetDirectory;
    //private $slugger;

    public function __construct($targetDirectory) //, SluggerInterface $slugger)
    {
        $this->targetDirectory = $targetDirectory;
        //$this->slugger = $slugger;
    }

    public function upload(UploadedFile $file, $title = "")
    {
        $slug = new Slugify();

        if (isEmpty($title)) {
            $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $slug->slugify($originalFilename).'-'.uniqid().'.'.$file->guessExtension();
            //$fileName = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();
        } else {
            $fileName = $slug->slugify($title).'-'.uniqid().'.'.$file->guessExtension();
        }



        try {
            $file->move($this->getTargetDirectory(), $fileName);
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }

        return $fileName;
    }

    public function setTargetDirectory($targerDirectory)
    {
        $this->targetDirectory = $targerDirectory;
    }
    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}