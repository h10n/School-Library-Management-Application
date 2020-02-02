<?php

namespace App\Http\Requests;
use App\Member;

class UpdateMemberRequest extends StoreMemberRequest
{

    public function rules()
    {
      $member = Member::find($this->route('member'));
      $rules = parent::rules();
      $rules['nis'] = 'required|numeric|unique:members,nis,'.$this->route('member');
      $rules['email'] = 'required|email|unique:members,email,'.$this->route('member');
      $rules['password'] = '';
      return $rules;
    }


}
