@extends(config('settings.theme').'.layouts.site')


@section('content')



<div id="content_home" class="content group">
				            <div class="hentry group">
				            
				            
				            
				            <form id="contact_form_contact_us" class="contact_form" method="POST" action="{{ url('/login') }}">
				                    
				                    {{ csrf_field() }}
				                    <fieldset>
				                        <ul>
				                            <li class="text_field">
				                                <label for="login">
				                                <span class="label">Name</span>
				                                <br />					<span class="sublabel">This is the name</span><br />
				                                </label>
				                                <div class="input_prepend"><span class="add_on"><i class="icon_user"></i></span><input type="text" name="login" id="login" class="required" value="" /></div>
				                                 @if ($errors->has('login'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('login') }}</strong>
				                                    </span>
				                                @endif
				                            </li>

				                            
				                            <li class="text_field">
				                                <label for="password">
				                                <span class="label">Password</span>
				                                <br />					<span class="sublabel">This is fiel for password</span><br />
				                                </label>
				                                <div class="input_prepend"><span class="add_on"><i class="icon-lock"></i></span><input type="password" name="password"  class="required" value="" /></div>
				                                @if ($errors->has('name'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('name') }}</strong>
				                                    </span>
				                                @endif
				                            </li>
				                            <li class="submit_button">
	
				                                <input type="submit" name="yit_sendmail" value="Отправить" class="sendmail alignright" />			
				                            </li>
				                        </ul>
				                    </fieldset>
				                </form>
				            </div>
				            
</div>


@endsection
