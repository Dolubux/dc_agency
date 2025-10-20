// Initializations
document.addEventListener('DOMContentLoaded', function () {
  // Hide loader after load (simulate quick load)
  const loader = document.getElementById('loader');
  setTimeout(() => {
    loader.style.opacity = 0;
    setTimeout(()=> loader.style.display = 'none', 450);
  }, 700);

  // Set year in footer
  document.getElementById('year').textContent = new Date().getFullYear();

  // Initialize AOS
  if (window.AOS) AOS.init({ once: true, duration: 800, offset: 100 });

  // Event modal content injection
  const eventModal = document.getElementById('eventModal');
  eventModal && eventModal.addEventListener('show.bs.modal', function (e) {
    const button = e.relatedTarget;
    const title = button.getAttribute('data-title');
    const img = button.getAttribute('data-img');
    document.getElementById('eventModalTitle').textContent = title;
    document.getElementById('eventModalImg').src = img;
  });

  // Gallery image modal
  const imgModal = document.getElementById('imgModal');
  if (imgModal) {
    imgModal.addEventListener('show.bs.modal', function(e){
      const img = e.relatedTarget;
      const src = img.getAttribute('data-src');
      document.getElementById('imgModalSrc').src = src;
    });
  }

  // Simple client-side form handling (demo)
  // Validate bootstrap forms and show simple success message
  const forms = document.querySelectorAll('.needs-validation');
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      } else {
        // prevent default submission for demo; show toast / alert
        event.preventDefault();
        showFormSuccess(form);
      }
      form.classList.add('was-validated');
    }, false);
  });

  // Preview CV / photo names
  document.getElementById('appCV')?.addEventListener('change', function(e){
    const name = e.target.files[0]?.name || '';
    if(name) showTinyNote(`CV ajouté : ${name}`);
  });
  document.getElementById('appPhoto')?.addEventListener('change', function(e){
    const name = e.target.files[0]?.name || '';
    if(name) showTinyNote(`Photo ajoutée : ${name}`);
  });

  // Smooth scrolling for internal nav links
  document.querySelectorAll('a.nav-link[href^="#"]').forEach(a=>{
    a.addEventListener('click', function(e){
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if(target) target.scrollIntoView({behavior:'smooth', block:'start'});
      // collapse navbar on mobile
      const bsCollapse = bootstrap.Collapse.getInstance(document.querySelector('.navbar-collapse'));
      bsCollapse && bsCollapse.hide();
    });
  });

});

// Tiny UI helpers
function showTinyNote(text){
  const n = document.createElement('div');
  n.className = 'toast align-items-center text-bg-dark border-0';
  n.style.position = 'fixed';
  n.style.right = '1rem';
  n.style.bottom = '1rem';
  n.style.zIndex = 10600;
  n.style.padding = '0.85rem 1rem';
  n.innerHTML = `<div class="d-flex"><div class="toast-body">${text}</div><button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast"></button></div>`;
  document.body.appendChild(n);
  const t = new bootstrap.Toast(n, { delay: 2500 });
  t.show();
  n.addEventListener('hidden.bs.toast', ()=> n.remove());
}

function showFormSuccess(form){
  // Very simple inline success notice (replace with server submission logic)
  const container = form.closest('section') || form;
  const alert = document.createElement('div');
  alert.className = 'alert alert-success mt-3';
  alert.role = 'alert';
  alert.innerHTML = '<strong>Merci !</strong> Votre message a été enregistré (demo). Nous vous contacterons bientôt.';
  container.prepend(alert);
  setTimeout(()=> alert.remove(), 5000);

  // reset form validation (keep files for UX if needed)
  form.querySelectorAll('input:not([type=file]), textarea, select').forEach(i => i.value = '');
  form.classList.remove('was-validated');
}
