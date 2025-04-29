<!DOCTYPE html>
<html>
<head>
    <title>Nouvelle demande de contact</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #0d6efd; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; border: 1px solid #ddd; }
        .footer { margin-top: 20px; text-align: center; font-size: 12px; color: #777; }
        .detail { margin-bottom: 10px; }
        .detail-label { font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nouvelle demande de contact</h1>
        </div>
        
        <div class="content">
            <p>Vous avez reçu une nouvelle demande de contact via le formulaire du site FinCorp.</p>
            
            <div class="details">
                <div class="detail">
                    <span class="detail-label">Nom :</span> {{ $loan['name'] }}
                </div>
                <div class="detail">
                    <span class="detail-label">Email :</span> {{ $loan['email'] }}
                </div>
                <div class="detail">
                    <span class="detail-label">Téléphone :</span> {{ $loan['phone'] }}
                </div>
                <div class="detail">
                    <span class="detail-label">Sujet :</span> {{ $loan['subject'] ?? 'Non spécifié' }}
                </div>
                @if(isset($loan['loan_amount']))
                <div class="detail">
                    <span class="detail-label">Montant souhaité :</span> {{ number_format($loan['loan_amount'], 0, ',', ' ') }} €
                </div>
                @endif
                @if(isset($loan['loan_duration']))
                <div class="detail">
                    <span class="detail-label">Durée souhaitée :</span> {{ $loan['loan_duration'] }} ans
                </div>
                @endif
                <div class="detail">
                    <span class="detail-label">Message :</span>
                    <p>{{ $loan['message'] }}</p>
                </div>
            </div>
        </div>
        
        <div class="footer">
            <p>Cet email a été envoyé depuis le formulaire de contact du site FinCorp.</p>
            <p>© {{ date('Y') }} FinCorp. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>