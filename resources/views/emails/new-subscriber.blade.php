<!DOCTYPE html>
<html lang="{{ $subscriber->locale }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subscriber->locale === 'vi' ? 'Nguoi dang ky moi' : 'New Subscriber' }}</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #1e3a5f;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background: #f9fafb;
            padding: 20px;
            border: 1px solid #e5e7eb;
            border-top: none;
        }
        .info-row {
            display: flex;
            padding: 8px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        .info-label {
            font-weight: 600;
            width: 120px;
            color: #6b7280;
        }
        .info-value {
            flex: 1;
            color: #111827;
        }
        .button {
            display: inline-block;
            background: #1e3a5f;
            color: white !important;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            color: #6b7280;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 style="margin: 0; font-size: 24px;">
            {{ $subscriber->locale === 'vi' ? 'Nguoi Dang Ky Moi' : 'New Subscriber' }}
        </h1>
    </div>

    <div class="content">
        <p>
            {{ $subscriber->locale === 'vi'
                ? 'Co nguoi moi dang ky nhan ban tin tu website Only by Grace.'
                : 'A new subscriber has signed up for the newsletter from Only by Grace website.' }}
        </p>

        <div style="margin: 20px 0;">
            <div class="info-row">
                <span class="info-label">Email:</span>
                <span class="info-value">{{ $subscriber->email }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">
                    {{ $subscriber->locale === 'vi' ? 'Ten:' : 'Name:' }}
                </span>
                <span class="info-value">
                    {{ $subscriber->name ?? ($subscriber->locale === 'vi' ? '(Khong cung cap)' : '(Not provided)') }}
                </span>
            </div>
            <div class="info-row">
                <span class="info-label">
                    {{ $subscriber->locale === 'vi' ? 'Ngon ngu:' : 'Language:' }}
                </span>
                <span class="info-value">
                    {{ $subscriber->locale === 'vi' ? 'Tieng Viet' : 'English' }}
                </span>
            </div>
            <div class="info-row">
                <span class="info-label">IP:</span>
                <span class="info-value">{{ $subscriber->ip_address ?? 'N/A' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">
                    {{ $subscriber->locale === 'vi' ? 'Thoi gian:' : 'Time:' }}
                </span>
                <span class="info-value">{{ $subscriber->created_at->format('Y-m-d H:i:s') }}</span>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="{{ url('/admin/subscribers/' . $subscriber->id . '/edit') }}" class="button">
                {{ $subscriber->locale === 'vi' ? 'Xem trong Admin' : 'View in Admin' }}
            </a>
        </div>
    </div>

    <div class="footer">
        <p>
            {{ $subscriber->locale === 'vi'
                ? 'Day la email tu dong tu he thong Only by Grace.'
                : 'This is an automated email from Only by Grace system.' }}
        </p>
    </div>
</body>
</html>