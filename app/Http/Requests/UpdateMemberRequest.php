<?php

namespace App\Http\Requests;
use App\Member;

class UpdateMemberRequest extends StoreMemberRequest
{

    public function rules()
    {
      $member = Member::find($this->route('member'));
      $userId = $member->user ? $member->user->id : '';
      
      $rules = parent::rules();
      $rules['no_induk'] = 'required|digits_between:1,20|numeric|unique:members,no_induk,'.$this->route('member');
      $rules['email'] = 'required|string|max:60|email|unique:members,email,'.$this->route('member');
      $rules['username'] = 'required|string|max:30|unique:users,username,'.$userId;
      $rules['password'] = '';
      return $rules;
    }


}
