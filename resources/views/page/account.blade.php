@extends('layout.default')

@if (session('errorMessage'))
    @include('partials.errorMessage', ['message' => session('errorMessage')])
@endif

@if (session('successMessage'))
    @include('partials.successMessage', ['message' => session('successMessage')])
@endif

@section('content')
    <div class="container">
        <div class="flex flex-col lg:flex-row">
            <div class="flex-1">
                <div class="md:mr-2">
                    <h1 class="text-gray-900 page-title title-font inline-block mt-8 mb-6">
                        <span class="base" data-ui-id="page-title-wrapper">
                            Customer Login
                        </span>
                    </h1>
                </div>
                <div class="w-full mb-8">
                    <div aria-labelledby="block-customer-login-heading" class="card mr-4">
                        <form class="form form-login" action="{{ url('login') }}" method="post" id="customer-login-form"
                            x-data="{ loginEmail: '', submitted: false }" @submit.prevent="submitted = true; $el.submit()">
                            @csrf

                            <fieldset class="fieldset login">
                                <h6 class="uppercase tracking-widest text-base mb-4">
                                    Login
                                </h6>
                                <div class="text-gray-600 mb-4 tracking-wider w-full lg:w-3/5">
                                    If you have an account, sign in with your email address.
                                </div>
                                <div class="field mb-3">
                                    <label class="label tracking-wider" for="login-email">
                                        <span>Email</span>
                                    </label>
                                    <div class="control">
                                        <input data-test="login-email" name="login-email" class="form-input" required
                                            x-model="loginEmail" autocomplete="off" id="login-email" type="email"
                                            title="Email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="pass" class="label">
                                        <span>Password</span>
                                    </label>
                                    <div class="control flex items-center">
                                        <input data-test="login-password" name="password" class="form-input" required=""
                                            autocomplete="off" id="pass" title="Password" type="password">
                                    </div>
                                </div>
                                <div class="actions-toolbar flex justify-between items-center">
                                    <button data-test="login-submit" type="submit"
                                        class="btn bg-green-700 hover:bg-green-500 active:bg-green-900 disabled:opacity-75"
                                        name="send">
                                        <span>Sign In</span>
                                    </button>
                                    <a class="underline text-gray-500 hover:text-green-600 active:text-green-800 tracking-wider"
                                        href="#">
                                        <span>Forgot Your Password?</span>
                                    </a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

            <div class="flex-1">
                <div class="">
                    <h1 class="text-gray-900 page-title title-font inline-block mt-8 mb-6">
                        <span class="base" data-ui-id="page-title-wrapper">
                            Create new custom account
                        </span>
                    </h1>
                </div>
                <div class="w-full mb-8">
                    <div class="card md:my-0 my-2">
                        <form class="form form-login" action="{{ url('register') }}" method="post"
                            id="customer-register-form">
                            @csrf

                            <div>
                                <h6 class="uppercase tracking-widest text-base mb-4" role="heading" aria-level="2">
                                    Personal Information
                                </h6>
                            </div>
                            <div class="field mb-3">
                                <label class="label" for="firstname">
                                    <span>First Name</span>
                                </label>
                                <div class="control">
                                    <input data-test="register-firstName" class="form-input" required="" value=""
                                        autocomplete="off" id="firstname" name="firstname" type="text" title="First Name"
                                        pattern="[a-zA-Z\s]+">
                                </div>
                            </div>

                            <div class="field mb-8">
                                <label class="label" for="lastname">
                                    <span>Last Name</span>
                                </label>
                                <div class="control">
                                    <input data-test="register-lastName" name="lastname" class="form-input" required=""
                                        value="" autocomplete="off" id="lastname" type="text" title="Last Name"
                                        pattern="[a-zA-Z\s]+">
                                </div>
                            </div>

                            <div>
                                <h2 class="uppercase tracking-widest text-base mb-4" role="heading" aria-level="2">
                                    Sign In Information
                                </h2>
                            </div>

                            <div class="field mb-3">
                                <label class="label" for="register-email">
                                    <span>Email</span>
                                </label>
                                <div class="control">
                                    <input data-test="register-email" name="register-email" class="form-input"
                                        required="" value="" autocomplete="off" id="register-email"
                                        type="email" title="Email"
                                        pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                                </div>
                            </div>

                            <div class="field mb-3">
                                <label class="label" for="password">
                                    <span>Password</span>
                                </label>
                                <div class="control">
                                    <input data-test="login-password" name="password" class="form-input" required=""
                                        autocomplete="off" id="pass" title="Password" type="password"
                                        pattern="^(?=.*[a-zA-Z])(?=.*\d).+$">
                                </div>
                            </div>

                            <div class="field mb-6">
                                <label class="label" for="password_confirmation">
                                    <span>Confirm Password</span>
                                </label>
                                <div class="control">
                                    <input data-test="register-passwordConfirm" name="password_confirmation"
                                        class="form-input" required="" value="" autocomplete="off"
                                        id="password_confirmation" type="password" title="Confirm Password">
                                </div>
                            </div>

                            <div class="flex items-center">
                                <input type="hidden" name="subscribed" value="0">
                                <input id="subscribed" name="subscribed" data-test="register-newsletter" type="checkbox"
                                    value="1"
                                    class="w-4 h-4 text-green-600 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 mr-4">
                                <label for="subscribed" class="m-0 text-gray-950">Sign up for a Newsletter</label>
                            </div>

                            <div class="actions-toolbar flex self-end">
                                <button type="submit" data-test="register-submit"
                                    class="btn bg-green-700 hover:bg-green-500 active:bg-green-900 disabled:opacity-75">
                                    <span>Create an Account</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
