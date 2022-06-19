<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait PluralTrait
{
    public function findVariant($plural_matches, $look_for)
    {
        foreach ($plural_matches as $key=>$variants) {
            if (in_array($look_for, $variants)) {
                return $key;
            }
        }
        return false;
    }
    
    // /**
    //  * @param Request $request
    //  * @return $this|false|string
    //  */
    // public function verifyAndUpload(Request $request, $fieldname = 'image', $directory = 'images')
    // {
    //     if ($request->hasFile($fieldname)) {
    //         if (!$request->file($fieldname)->isValid()) {
    //             flash('Invalid Image!')->error()->important();

    //             return redirect()->back()->withInput();
    //         }

    //         return $request->file($fieldname)->store($directory, 'public');
    //     }

    //     return null;
    // }


    public function pluralNumber($numbers)
    {
        $plural_matches = [
            'numer' => ['1'],
            'numerów' => ['*0', '*1', '*5', '*6', '*7', '*8', '*9'],
            'numery' => ['*2', '*3', '*4']
        ];
        
        $number = (string)count($numbers);
        $last_digit = substr($number, -1);
   
        $look_for = strlen($number) == $last_digit && $last_digit == 1 ? '1' : "*$last_digit";

        $number_count =  "$number ".$this->findVariant($plural_matches, $look_for);
       
        return  $number_count;
    }
}
