@extends('layouts.app')
@section('title', 'EduX | Settings')
@section('content')
     <div class="settings-container">
        <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- General Settings -->
            <div class="settings-section">
                <h2>General Settings</h2>
                <label for="site-title">Site Title:</label>
                <input type="text" id="site-title" name="site_title"
                    value="{{ old('site_title', $settings->site_title ?? '') }}" placeholder="Enter site title">

                <label for="logo-upload">Upload Logo:</label>
                <input type="file" id="logo-upload" name="logo">

                    <div class="mb-3">
                        @if (!empty($settings->logo))
                            <div class="mt-3">
                                <p class="mb-1">Current Logo:</p>
                                <img src="{{ asset('/storage/' . $settings->logo) }}" alt="Site Logo" style="max-height: 80px;">
                            </div>
                        @endif
                    </div>

                {{-- <label for="favicon-upload">Upload Favicon:</label>
                <input type="file" id="favicon-upload" name="favicon"> --}}
            </div>
            <hr>
            <!-- User Settings -->
            <div class="settings-section">
                <h2>User Settings</h2>
                <label for="admin-email">Admin Email:</label>
                <input type="email" id="admin-email" name="admin_email"
                    value="{{ old('admin_email', $settings->admin_email ?? '') }}" placeholder="Enter admin email">

                <label for="admin-password">Change Password:</label>
                <input type="password" id="admin-password" name="admin_password" placeholder="Enter new password">
            </div>
            <hr>
            <!-- Notification Settings -->
            <div class="settings-section">
                <h2>Notification Settings</h2>
                <div class="form-group">
                    <span class="switch-label">Enable Notifications</span>
                    <label class="switch">
                        <input type="checkbox" id="enable-notifications" name="enable_notifications"
                            {{ old('enable_notifications', $settings->enable_notifications ?? false) ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>
                </div>

                <label for="notification-template">Edit Notification Template:</label>
                <textarea id="notification-template" name="notification_template" rows="4"
                    placeholder="Edit the notification message">{{ old('notification_template', $settings->notification_template ?? '') }}</textarea>
            </div>
            <hr>
            <!-- Payment Settings -->
            <div class="settings-section">
                <h2>Payment Settings</h2>
                <label for="payment-gateway">Payment Gateway:</label>
                <input type="text" id="payment-gateway" name="payment_gateway"
                    value="{{ old('payment_gateway', $settings->payment_gateway ?? '') }}"
                    placeholder="Enter payment gateway name">

                <label for="api-key">API Key:</label>
                <input type="text" id="api-key" name="api_key" value="{{ old('api_key', $settings->api_key ?? '') }}"
                    placeholder="Enter API key">

                <label for="subscription-price">Subscription Price:</label>
                <input type="number" id="subscription-price" name="subscription_price"
                    value="{{ old('subscription_price', $settings->subscription_price ?? '') }}"
                    placeholder="Enter subscription price">
            </div>

            <button type="submit" class="btn-save">Save Settings</button>
        </form>
    </div>

   
    <style>
        .settings-container {
            max-width: 1245px;
            margin: 0 auto;
            padding: 45px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .switch {
            position: relative;
            margin-top: 2px;
            display: inline-block;
            width: 35px;
            height: 20px;
            vertical-align: middle;
            margin-right: 10px;
            margin-left: 15px
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 20px;
        }

        .slider::before {
            position: absolute;
            content: '';
            height: 14px;
            width: 14px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #4CAF50;
        }

        input:checked+.slider::before {
            transform: translateX(15px);
        }

        .switch-label {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }
    </style>
@endsection
