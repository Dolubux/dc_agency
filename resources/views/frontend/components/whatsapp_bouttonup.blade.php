<!-- Bouton WhatsApp flottant -->
<a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $parametre?->contact1) }}" 
   target="_blank" 
   class="whatsapp-float" 
   title="Contactez-nous sur WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>

<!-- Bouton de remontée -->
<button id="scrollToTop" class="scroll-to-top" title="Remonter en haut">
    <i class="fas fa-chevron-up"></i>
</button>

<style>
.whatsapp-float {
    position: fixed;
    bottom: 90px;
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
.scroll-to-top {
    position: fixed;
    bottom: 20px;
    right: 30px;
    width: 50px;
    height: 50px;
    background: var(--gradient-primary, linear-gradient(135deg, #FF3C00 0%, #FF6B35 100%));
    color: white;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(255, 60, 0, 0.3);
    z-index: 9999;
    opacity: 0;
    visibility: hidden;
    transform: translateY(100px);
    transition: all 0.3s;
}
.scroll-to-top.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}
.scroll-to-top:hover {
    transform: scale(1.1) translateY(-2px);
    box-shadow: 0 8px 32px rgba(255, 60, 0, 0.5);
}
@media (max-width: 600px) {
    .whatsapp-float {
        width: 50px;
        height: 50px;
        bottom: 80px;
        right: 15px;
        font-size: 1.5rem;
    }
    .scroll-to-top {
        width: 40px;
        height: 40px;
        bottom: 15px;
        right: 15px;
        font-size: 1.1rem;
    }
}
</style>

<script>
// Bouton de remontée
window.addEventListener('scroll', function() {
    const scrollToTopBtn = document.getElementById('scrollToTop');
    if (window.scrollY > 300) {
        scrollToTopBtn.classList.add('show');
    } else {
        scrollToTopBtn.classList.remove('show');
    }
});
document.getElementById('scrollToTop').addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});
</script>