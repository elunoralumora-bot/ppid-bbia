<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PPID BBIA - Pejabat Pengelola Informasi dan Dokumentasi')</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        
        body {
            background: linear-gradient(135deg, #0f2338 0%, #2c5282 35%, #1a3a5f 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }
        
        .auth-container {
            width: 100%;
            max-width: 450px;
            height: 90vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .auth-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            overflow-y: auto;
            max-height: 90vh;
        }
        
        .auth-header {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .auth-header h2 {
            color: #1a3a5f;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        
        .auth-header p {
            color: #666;
            font-size: 14px;
            margin-bottom: 0;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #1a3a5f;
            font-weight: 600;
            font-size: 14px;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #1a3a5f;
            box-shadow: 0 0 0 3px rgba(26, 58, 95, 0.1);
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .checkbox-label {
            display: flex;
            align-items: center;
            color: #666;
            font-size: 14px;
            cursor: pointer;
        }
        
        .checkbox-label input[type="checkbox"] {
            display: none;
        }
        
        .checkmark {
            width: 18px;
            height: 18px;
            border: 2px solid #e9ecef;
            border-radius: 4px;
            margin-right: 8px;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .checkbox-label input[type="checkbox"]:checked + .checkmark {
            background: #1a3a5f;
            border-color: #1a3a5f;
        }
        
        .checkbox-label input[type="checkbox"]:checked + .checkmark::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 12px;
        }
        
        .forgot-password, .terms-link, .login-link, .register-link {
            color: #1a3a5f;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
        }
        
        .forgot-password:hover, .terms-link:hover, .login-link:hover, .register-link:hover {
            text-decoration: underline;
        }
        
        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            font-size: 16px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-block;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #1a3a5f, #2c5282);
            color: white;
            width: 100%;
            display: block;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #102841, #1e3d5a);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 58, 95, 0.3);
        }
        
        .auth-footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #e9ecef;
        }
        
        .auth-footer p {
            color: #666;
            font-size: 14px;
            margin-bottom: 0;
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }
        
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }
            
            .auth-container {
                max-width: 100%;
                height: 95vh;
            }
            
            .auth-card {
                padding: 20px;
                max-height: 95vh;
            }
            
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
            
            .form-row .form-group {
                margin-bottom: 20px;
            }
            
            .form-options {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            @yield('content')
        </div>
    </div>
</body>
</html>
