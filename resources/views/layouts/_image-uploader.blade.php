@php
    $id = str_replace(' ','',ucwords(str_replace('_', ' ', $name)));      
    $imgDir = 'storage/uploads/'.$dir.'/';
    $imgUrl = $data ? asset($imgDir.$data) : asset('img/no-avatar-small.svg');    
@endphp
<div class="form-group{{$errors->has($name) ? ' has-error' : ''}}">
    {!! Form::label($name, $label, ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
        <div class="avatar-upload" id="avatarUpload{{ $id }}">
            <div class="avatar-edit">               
                {!! Form::file($name,['id' => $name, 'onchange' => 'changeAvatar(event, this)']) !!}
                <label for="{{ $name }}"></label>
            </div>
        
            <div class="avatar-delete">                                    
                <a href="javascript:void(0)" class="imageDelete"></a>  
            </div>
            {{-- <div class="avatar-capture">                                    
                <a href="javascript:void(0)" class="image-capture" data-toggle="modal" data-target="#modalWebcam"></a>  
            </div> --}}
            <div class="avatar-preview">            
                <div class="imagePreview" style="background-image: url({{ $imgUrl }});" data-default="{{ $imgUrl }}">
                </div>            
            </div>
        </div>
        {!! $errors->first($name,'<p class="help-block"><strong>:message</strong></p>') !!}    
    </div>
</div>