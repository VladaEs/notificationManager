<?php

namespace App\Livewire;

use App\Models\CompanyUser;
use Livewire\Component;
class UserCompanySelect extends Component
{
    public $user= null;

    public int|null $companyId = null;
    public $dataArr = null;
    public string|null $textValueName = null;

    public function mount($userVal, $dataArr=[], $textValueName = 'name'){
        $this->user = $userVal;
        $this->dataArr = $dataArr; 
        $this->textValueName = $textValueName;
        $this->companyId = $this->user['company_id'];

        //dd($this->user['company_id'], $dataArr[0]['id']);
    }

public function updatedCompanyId($value){
    $userId = $this->user['id'];
    $userData = CompanyUser::updateOrCreate(
        ['user_id'=> $userId],
        ['company_id'=>$value]
    );
// будет срабатывать при изменении select
}
 
    // ...



    public function render()
    {
        return view('livewire.user-company-select');
    }
}
