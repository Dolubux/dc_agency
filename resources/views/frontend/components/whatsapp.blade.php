
    <!-- Bouton WhatsApp flottant -->
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $parametre?->contact1) }}" 
       target="_blank" 
       class="whatsapp-float" 
       title="Contactez-nous sur WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <style>
    .whatsapp-float {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        box-shadow: 0 4px 20px rgba(37, 211, 102, 0.3);
        z-index: 9999;
        transition: all 0.3s;
        animation: whatsapp-pulse 2s infinite;
        text-decoration: none;
    }
    .whatsapp-float:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 32px rgba(37, 211, 102, 0.5);
        color: #fff;
    }
    @keyframes whatsapp-pulse {
        0%, 100% { box-shadow: 0 4px 20px rgba(37,211,102,0.3);}
        50% { box-shadow: 0 4px 20px rgba(37,211,102,0.7), 0 0 0 10px rgba(37,211,102,0.1);}
    }
    @media (max-width: 600px) {
        .whatsapp-float {
            width: 50px;
            height: 50px;
            bottom: 20px;
            right: 20px;
            font-size: 1.5rem;
        }
    }
    </style>