@extends('layout.default')

@if (session('errorMessage'))
    @include('partials.errorMessage', ['message' => session('errorMessage')])
@endif

@if (session('successMessage'))
    @include('partials.successMessage', ['message' => session('successMessage')])
@endif

@section('content')
    <div class="container mt-6 mb-0 font-bold lg:mt-8 text-3xl flex mb-2 items-end">
        <div class="w-1/2 mr-2">
            <h1 class="text-gray-900 page-title title-font inline-block mt-8">
                <span class="base" data-ui-id="page-title-wrapper">
                    Customer Login
                </span>
            </h1>
        </div>
        <div class="pl-2">
            <h1 class="text-gray-900 page-title title-font inline-block mt-8">
                <span class="base" data-ui-id="page-title-wrapper">
                    Create new custom account
                </span>
            </h1>
        </div>
    </div>

    <div class="columns">
        <div class="column main">
            <div id="customer-login-container" class="login-container">
                <div class="w-full md:w-1/2 card mr-4">
                    <div aria-labelledby="block-customer-login-heading">
                        <form class="form form-login" action="{{ url('login') }}" method="post" id="customer-login-form">
                            @csrf

                            <fieldset class="fieldset login">
                                <legend class="mb-3">
                                    <h2 class="text-xl font-medium title-font text-primary">
                                        Login
                                    </h2>
                                </legend>
                                <div class="text-secondary-darker mb-4">
                                    If you have an account, sign in with your email address.
                                </div>
                                <div class="field">
                                    <label class="label" for="email">
                                        <span>Email</span>
                                    </label>
                                    <div class="control">
                                        <input data-test="login-email" name="email" class="form-input" required=""
                                            value="" autocomplete="off" id="email" type="email" title="Email">
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
                                <div class="actions-toolbar flex justify-between pt-6 pb-2 items-center">
                                    <button data-test="login-submit" type="submit"
                                        class="btn bg-green-700 hover:bg-green-500 active:bg-green-900 disabled:opacity-75"
                                        name="send">
                                        <span>Sign In</span>
                                    </button>
                                    <a class="underline text-secondary" href="#">
                                        <span>Forgot Your Password?</span>
                                    </a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="card w-full md:w-1/2 my-8 md:my-0">
                    <form class="form form-login" action="{{ url('register') }}" method="post" id="customer-register-form">
                        @csrf

                        <div>
                            <h2 class="text-xl font-medium title-font mb-3 text-primary" role="heading" aria-level="2">
                                Personal Information
                            </h2>
                        </div>

                        <div class="field mb-3">
                            <label class="label" for="firstname">
                                <span>First Name</span>
                            </label>
                            <div class="control">
                                <input data-test="register-firstName" class="form-input" required="" value=""
                                    autocomplete="off" id="firstname" name="firstname" type="text" title="First Name">
                            </div>
                        </div>

                        <div class="field mb-8">
                            <label class="label" for="lastname">
                                <span>Last Name</span>
                            </label>
                            <div class="control">
                                <input data-test="register-lastName" name="lastname" class="form-input" required=""
                                    value="" autocomplete="off" id="lastname" type="text" title="Last Name">
                            </div>
                        </div>

                        <div>
                            <h2 class="text-xl font-medium title-font mb-3 text-primary" role="heading" aria-level="2">
                                Sign In Information
                            </h2>
                        </div>

                        <div class="field mb-3">
                            <label class="label" for="email">
                                <span>Email</span>
                            </label>
                            <div class="control">
                                <input data-test="register-email" name="email" class="form-input" required=""
                                    value="" autocomplete="off" id="email" type="email" title="Email">
                            </div>
                        </div>

                        <div class="field mb-3">
                            <label class="label" for="password">
                                <span>Password</span>
                            </label>
                            <div class="control">
                                <input data-test="register-password" name="password" class="form-input" required=""
                                    value="" autocomplete="off" id="password" type="password" title="Password">
                            </div>
                        </div>

                        <div class="field mb-3">
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

                        <div class="actions-toolbar pt-6 pb-2 flex self-end">
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
@stop
