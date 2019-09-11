@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">            
            @include('inc.message')
            <div class="card">                
                {!! Form::open(['action' => 'DataController@store', 'method' => 'POST','class'=>'form-group']) !!}
                    <div class="card-header" >Step 1: Your details</div> 
                    <div id="detailDiv" class="card-body">
                        <table style="width: 100%">
                        <tr>
                        <td class="form-group">
                            {{Form::label('first_name', 'First Name')}}
                            {{Form::text('first_name', '', ['class' => 'form-control'])}}
                        </td>
                            <td class="form-group">
                                {{Form::label('surname', 'Surname')}}
                                {{Form::text('surname', '', ['class' => 'form-control'])}}
                            </td>
                            <td class="form-group">&nbsp;</td>
                            <td class="form-group">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="form-group">
                                {{Form::label('email', 'Email Address:')}}
                                {{Form::email('email', '', ['class' => 'form-control'])}}
                            </td>
                            <td class="form-group">&nbsp;</td>
                            <td class="form-group">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="form-group"><span id='errorDiv_detail' class="errorDiv"></span></td>
                            <td class="form-group"><button type="button" onclick="validateDetails()" class='btn btn-primary btn-block'>Next</button></td>
                        </tr>
                        </table>
                    </div>
                    <div class="card-header">Step 2: More comments</div> 
                    <div id="commentDiv" class="card-body" style="display:none">
                        <table style="width: 100%">
                            <tr>
                                <td class="form-group">
                                    {{Form::label('telephone', 'Telephone number')}}
                                    {{Form::number('telephone', '', ['class' => 'form-control'])}}
                                </td>
                                <td class="form-group">
                                    {{Form::label('gender', 'Gender')}}
                                    {{Form::select('gender',  array('' => 'Pleaes select', 'Male' => 'Male', 'Femail' => 'Femail'), ['class' => 'form-control'])}}
                                </td>
                                <td class="form-group">&nbsp;</td>
                            </tr>
                            <tr>
                                 <td>
                                    {{Form::label('dob', 'Date of Birth')}}
                                    {{Form::date('dob', '', ['class' => 'form-control'])}}
                                 </td>
                                 <td class="form-group">&nbsp;</td>
                                 <td class="form-group">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="form-group"><span id='errorDiv_comment' class="errorDiv"></span></td>
                                <td class="form-group"><button type="button" onclick="validateComment()" class='btn btn-primary btn-block'>Next</button></td>
                            </tr>
                        </table>                         
                    </div>
                    <div class="card-header" style="margin-bottom:0.2em !important;">Step 3: Final Comment</div> 
                    <div id="finalDiv" class="card-body" style="display:none">
                        <table style="width: 100%">
                            <tr>
                                <td colspan="2" class="form-group">
                                    {{Form::label('comment', 'Comment')}}
                                    {{Form::textarea('comment', '', ['class' => 'form-control'])}}
                                </td>
                                <td valign="bottom">
                                    {{Form::submit('Next',['class'=>'btn btn-primary'])}}
                                </td>
                            </tr>
                        </table>
                    </div>                    
                {!! Form::close() !!}                
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    function validateDetails(){
        var firstName = document.getElementById("first_name").value;
        var surname = document.getElementById("surname").value;
        var email = document.getElementById("email").value;
        var error = 0;
        
        if(firstName === '') 
            error++;
        if(surname === '') 
            error++;
        if(email === '') {
            error++;
        }
        if(!validateEmail(email)){
            error++;
        }
            
        if(error > 0){
            document.getElementById("errorDiv_detail").innerHTML = 'Please fill in the correct details'
        }
        else{
            document.getElementById("errorDiv_detail").innerHTML = ''
            document.getElementById("detailDiv").style.display = 'none';
            document.getElementById("commentDiv").style.display = 'block';
        }
    }
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
    function validateComment(){
        var telephone = document.getElementById("telephone").value;
        var gender = document.getElementById("gender").value;
        var dob = document.getElementById("dob").value;
        var error = 0;
        
        if(telephone === '') 
            error++;
        if(gender === '') 
            error++;
        if(dob === '') {
            error++;
        }
        if(!validateTelephone(telephone)){
            error++;
        }
        console.log(validateTelephone(telephone));
        if(error > 0){
            document.getElementById("errorDiv_comment").innerHTML = 'Please fill in the correct details'
        }
        else{
            document.getElementById("errorDiv_comment").innerHTML = ''
            document.getElementById("commentDiv").style.display = 'none';
            document.getElementById("finalDiv").style.display = 'block';
        }
    }
    function validateTelephone(telephone){
        var re = /^[0]{1}[0-9]{10}$/
        return re.test(String(telephone).toLowerCase());
    }
</script>
