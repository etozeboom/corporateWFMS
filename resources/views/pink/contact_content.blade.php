
@if (count($errors) > 0)
				    <div class="box error-box">
				        
				            @foreach ($errors->all() as $error)
				                <p>{{ $error }}</p>
				            @endforeach
				   
				    </div>
				@endif
				
				@if (session('status'))
				    <div class="box success-box">
				        {{ session('status') }}
				    </div>
				@endif

<div id="content_page" class="content group">
				            <div class="hentry group">
				                <form id="contact_form_contact_us" class="contact_form" method="post" action="{{ route('contacts') }}" enctype="multipart/form-data">
				                    <div class="usermessagea"></div>
				                    <fieldset>
				                        <ul>
				                            <li class="text_field">
				                                <label for="name_contact_us">
				                                <span class="label">Name</span>
				                                <br />					<span class="sublabel">This is the name</span><br />
				                                </label>
				                                <div class="input_prepend"><span class="add_on"><i class="icon_user"></i></span><input type="text" name="name" id="name_contact_us" class="required" value="" /></div>
				                                <div class="msg_error"></div>
				                            </li>
				                            <li class="text_field">
				                                <label for="email-contact-us">
				                                <span class="label">Email</span>
				                                <br />					<span class="sublabel">This is a field email</span><br />
				                                </label>
				                                <div class="input_prepend"><span class="add_on"><i class="icon-envelope"></i></span><input type="text" name="email" id="email-contact-us" class="required email-validate" value="" /></div>
				                                <div class="msg_error"></div>
				                            </li>
				                            <li class="textarea_field">
				                                <label for="message_contact_us">
				                                <span class="label">Message</span>
				                                </label>
				                                <div class="input_prepend"><span class="add_on"><i class="icon_pencil"></i></span><textarea name="text" id="message_contact_us" rows="8" cols="30" class="required"></textarea></div>
				                                <div class="msg_error"></div>
				                            </li>
				                            <li class="submit_button">
				                            {{ csrf_field() }}
				                                <input type="text" name="yit_bot" id="yit_bot" />
				                              
				                                <input type="submit" name="yit_sendmail" value="Send Message" class="sendmail alignright" />			
				                            </li>
				                        </ul>
				                    </fieldset>
				                </form>
				                <script type="text/javascript">
				                    var messages_form_126 = {
				                    	name: "Please, fill in your name",
				                    	email: "Please, insert a valid email address",
				                    	message: "Please, insert your message"
				                    };
				                </script>
				            </div>
				            <!-- START COMMENTS -->
				            <div id="comments">
				            </div>
				            <!-- END COMMENTS -->
				        </div>