<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Inquiry — NOVAREX</title>
  <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { background: #f0f4f8; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif; color: #1e293b; }
    a { color: #1a56db; text-decoration: none; }
  </style>
</head>
<body style="background:#f0f4f8; padding: 32px 16px;">

  <!-- Wrapper -->
  <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" role="presentation" style="max-width:600px; width:100%;">

          <!-- Header -->
          <tr>
            <td style="background: linear-gradient(135deg, #1a56db 0%, #0e9f6e 100%); border-radius: 12px 12px 0 0; padding: 32px 40px; text-align: center;">
              <table cellpadding="0" cellspacing="0" role="presentation" style="margin: 0 auto 16px;">
                <tr>
                  <td style="background: rgba(255,255,255,0.15); border-radius: 10px; padding: 8px 14px;">
                    <span style="font-size: 13px; font-weight: 900; color: #fff; letter-spacing: 0.05em;">NVX</span>
                  </td>
                </tr>
              </table>
              <h1 style="font-size: 20px; font-weight: 800; color: #ffffff; letter-spacing: -0.02em; margin: 0 0 4px;">New Inquiry Received</h1>
              <p style="font-size: 13px; color: rgba(255,255,255,0.8); margin: 0;">NOVAREX HSE &amp; Sustainability Ltd</p>
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td style="background: #ffffff; padding: 36px 40px;">

              <!-- Alert badge -->
              <table cellpadding="0" cellspacing="0" role="presentation" style="margin-bottom: 24px;">
                <tr>
                  <td style="background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 6px; padding: 8px 14px;">
                    <span style="font-size: 12px; font-weight: 600; color: #1a56db;">&#128276; You have a new client inquiry to review</span>
                  </td>
                </tr>
              </table>

              <!-- Sender info -->
              <p style="font-size: 15px; color: #64748b; margin-bottom: 20px; line-height: 1.5;">
                <strong style="color: #0f172a;">{{ $inquiry->name }}</strong> has submitted an inquiry through the NOVAREX website.
              </p>

              <!-- Details table -->
              <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="border: 1px solid #e2e8f0; border-radius: 10px; overflow: hidden; margin-bottom: 24px;">
                <tr style="background: #f8fafc;">
                  <td colspan="2" style="padding: 12px 18px; border-bottom: 1px solid #e2e8f0;">
                    <span style="font-size: 11px; font-weight: 700; color: #94a3b8; letter-spacing: 0.08em; text-transform: uppercase;">Contact Details</span>
                  </td>
                </tr>
                <tr>
                  <td style="padding: 12px 18px; border-bottom: 1px solid #f1f5f9; width: 35%; font-size: 12px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.04em;">Full Name</td>
                  <td style="padding: 12px 18px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #0f172a; font-weight: 500;">{{ $inquiry->name }}</td>
                </tr>
                <tr style="background: #fafafa;">
                  <td style="padding: 12px 18px; border-bottom: 1px solid #f1f5f9; font-size: 12px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.04em;">Email</td>
                  <td style="padding: 12px 18px; border-bottom: 1px solid #f1f5f9; font-size: 14px;">
                    <a href="mailto:{{ $inquiry->email }}" style="color: #1a56db; font-weight: 500;">{{ $inquiry->email }}</a>
                  </td>
                </tr>
                @if($inquiry->phone)
                <tr>
                  <td style="padding: 12px 18px; border-bottom: 1px solid #f1f5f9; font-size: 12px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.04em;">Phone</td>
                  <td style="padding: 12px 18px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #0f172a;">
                    <a href="tel:{{ $inquiry->phone }}" style="color: #1a56db;">{{ $inquiry->phone }}</a>
                  </td>
                </tr>
                @endif
                @if($inquiry->company)
                <tr style="background: #fafafa;">
                  <td style="padding: 12px 18px; border-bottom: 1px solid #f1f5f9; font-size: 12px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.04em;">Company</td>
                  <td style="padding: 12px 18px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #0f172a; font-weight: 500;">{{ $inquiry->company }}</td>
                </tr>
                @endif
                @if($inquiry->service)
                <tr>
                  <td style="padding: 12px 18px; font-size: 12px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.04em;">Service Interest</td>
                  <td style="padding: 12px 18px; font-size: 14px;">
                    <span style="background: #ecfdf5; color: #0e9f6e; font-size: 12px; font-weight: 600; padding: 3px 10px; border-radius: 99px;">{{ $inquiry->service }}</span>
                  </td>
                </tr>
                @endif
              </table>

              <!-- Message -->
              <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="border: 1px solid #e2e8f0; border-radius: 10px; overflow: hidden; margin-bottom: 28px;">
                <tr style="background: #f8fafc;">
                  <td style="padding: 12px 18px; border-bottom: 1px solid #e2e8f0;">
                    <span style="font-size: 11px; font-weight: 700; color: #94a3b8; letter-spacing: 0.08em; text-transform: uppercase;">Message</span>
                  </td>
                </tr>
                <tr>
                  <td style="padding: 18px; font-size: 14px; color: #334155; line-height: 1.7;">
                    {!! nl2br(e($inquiry->message)) !!}
                  </td>
                </tr>
              </table>

              <!-- CTA button -->
              <table cellpadding="0" cellspacing="0" role="presentation" style="margin-bottom: 20px;">
                <tr>
                  <td style="background: #1a56db; border-radius: 8px; padding: 0;">
                    <a href="{{ url('/admin/inquiries') }}" style="display: inline-block; padding: 12px 28px; font-size: 14px; font-weight: 600; color: #ffffff; text-decoration: none; border-radius: 8px;">
                      View in Admin Panel &rarr;
                    </a>
                  </td>
                </tr>
              </table>

              <p style="font-size: 12px; color: #94a3b8; line-height: 1.6;">
                You can reply directly to this email — it will go straight to <strong>{{ $inquiry->email }}</strong>.
              </p>

            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background: #1e293b; border-radius: 0 0 12px 12px; padding: 24px 40px; text-align: center;">
              <p style="font-size: 12px; color: #64748b; margin: 0 0 6px;">
                <span style="color: #cbd5e1; font-weight: 700;">NOVAREX HSE &amp; Sustainability Ltd</span>
              </p>
              <p style="font-size: 11px; color: #475569; margin: 0 0 4px;">Dar es Salaam, Tanzania</p>
              <p style="font-size: 11px; margin: 0;">
                <a href="mailto:info@novarex.co.tz" style="color: #60a5fa;">info@novarex.co.tz</a>
                &nbsp;|&nbsp;
                <a href="https://novarex.co.tz" style="color: #60a5fa;">novarex.co.tz</a>
              </p>
              <p style="font-size: 10px; color: #334155; margin: 12px 0 0;">
                This notification was sent automatically when a contact form was submitted on your website.
              </p>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>

</body>
</html>
