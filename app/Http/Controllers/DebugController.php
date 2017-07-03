<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DebugController extends Controller
{

    public function index(Request $request)
    {
        return view('docs.statement', [

            'parentName'          => 'Иванова Ивана Ивановича',
            'childrenName'        => 'Иванова Василия Ивановича',

            // проживающий по адресу
            'residentialAddress'  => 'ул. 8 Марта, д. 57, г. Белореченск, Белореченский район, Краснодарский край',

            // зарегистрированному
            'registrationAddress' => 'ул. Мая, д. 108, г. Белореченск, Белореченский район, Краснодарский край',

            'passportSerial'   => '12 34',
            'passportNumber'   => '123456',
            'passportDate'     => date('d-m-Y'),
            'passportFrom'     => 'ОТДЕЛ УФМС РОССИИ ПО КРАСНОДАРСКОМУ КРАЮ В БЕЛОРЕЧЕНСКОМ РАЙОНЕ',
            'passportDivision' => '999-999',

            'phone' => '+7 (918) 123-45-67',

            'childrenDocType'   => 'свидетельство о рождении',
            'childrenDocSerial' => '12345',
            'childrenDocNumber' => '1234567890',

            'childrenSchool' => 'МБОУ СОШ №123',
            'childrenClass'  => '4Б',

            // круж.
            'type'           => 'Юный&nbsp;конструктор'

        ]);
    }

}
