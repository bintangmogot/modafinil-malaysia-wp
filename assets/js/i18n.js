/**
 * Bilingual System JS Logic
 */

document.addEventListener('DOMContentLoaded', () => {
  // If URL has ?lang= parameter, set cookie and remove parameter from URL to keep it clean
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has('lang')) {
    const lang = urlParams.get('lang');
    if (lang === 'en' || lang === 'ms') {
      setLanguageCookie(lang);
      
      // Clean up URL without refreshing
      const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
      window.history.replaceState({path: newUrl}, '', newUrl);
    }
  }

  // Handle language toggle buttons
  const langToggles = document.querySelectorAll('.lang-toggle');
  
  langToggles.forEach(toggle => {
    toggle.addEventListener('click', (e) => {
      e.preventDefault();
      const targetLang = toggle.getAttribute('data-lang');
      
      if (targetLang === 'en' || targetLang === 'ms') {
        setLanguageCookie(targetLang);
        window.location.reload(); // Reload to render new language via PHP
      }
    });
  });
});

function setLanguageCookie(lang) {
  // Set cookie for 30 days, path=/ so it's available site-wide
  const date = new Date();
  date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000));
  document.cookie = `site_lang=${lang};expires=${date.toUTCString()};path=/`;
}
