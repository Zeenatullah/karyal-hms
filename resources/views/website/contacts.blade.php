@extends('website.layout.layout')

@section('menu')
    <div class="menu-item" style="background-color: lightblue; border: 1px solid black; border-radius: 50px;">
        <div class="container">
            <div class="row users-frm">
                <div class="col-lg-2"></div>
                <div class="col-lg-10">
                    <div class="nav-menu {{ app()->getLocale() === 'ps' ? 'text-align' : 'text-center' }}" style="height: 80px;">
                        <nav class="mainmenu users-frm">
                            <ul>
                                <li><a href="/"><b>@lang('text.Home')</b></a></li>
                                <li><a href="/rooms"><b>@lang('text.Rooms')</b></a></li>
                                <li><a href="/foods"><b>@lang('text.Food Menu')</b></a>
                                    <ul class="dropdown" style="border-radius: 5px; background-color: #d3d3d3c7">
                                        <li><a href="/foods" class="{{ app()->getLocale() === 'ps' ? 'text-right m-0' : '' }} ">@lang('text.Foods')</a></li>
                                        <li><a href="/drinkings" class="{{ app()->getLocale() === 'ps' ? 'text-right m-0' : '' }} ">@lang('text.Drinkings')</a></li>
                                    </ul>
                                </li>
                                <li><a href="/services"><b>@lang('text.Services')</b></a></li>
                                <li class="active"><a href="/contact"><b>@lang('text.Contacts')</b></a></li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><b>@lang('text.Login')</b></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contents')
 <!-- Contact Section Begin -->
    <section class="contact-section spad users-frm text-align" style="">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="text-center col-lg-6">   
                    @include('dashboard.inc.messages')
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-text">
                        <h2 style="font-family: badr-bold">@lang('text.Contact Info')</h2>
                        <p>@lang('text.Contact InfoText')</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="c-o">@lang('text.Address')</td>
                                    <td>@lang('text.Our address')</td>
                                </tr>
                                <tr>
                                    <td class="c-o">@lang('text.Phone number')</td>
                                    <td>@lang('text.Phone')</td>
                                </tr>
                                <tr>
                                    <td class="c-o">@lang('text.EmailAdress')</td>
                                    <td>Example@example.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-7">
                    {!! Form::open(['action' => 'ContactController@store', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class'=>"contact-form"]) !!}
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" required placeholder="@lang('text.Name')" name="name">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" required placeholder="@lang('text.Last Name')" name="lastName">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" required placeholder="@lang('text.Email')" name="email">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" required placeholder="@lang('text.Phone number')" name="phoneNumber">
                            </div>
                            <div class="col-lg-12">
                                <textarea required placeholder="@lang('text.Your Message')" name="message"></textarea>
                                {{-- {{Form::submit(__('text.Submit'), ['class' =>'contact_button'])}} --}}

                                <button type="submit">@lang('text.Submit')</button>
                            </div>
                        </div>
                    {!! Form::close() !!}  

                </div>
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d27175.53731647028!2d65.70512265585556!3d31.6354338780396!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2946be6523a86c78!2sKandahar%20University!5e0!3m2!1sen!2sbd!4v1594020798952!5m2!1sen!2sbd"
                    width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                </iframe>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->


@endsection