import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM loaded, initializing JavaScript...');
    
    // Mobile menu (only if elements exist on page)
    const button = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');
    const iconMenu = document.getElementById('icon-menu');
    const iconClose = document.getElementById('icon-close');

    console.log('Mobile menu elements:', { button, menu, iconMenu, iconClose });

    if (button && menu && iconMenu && iconClose) {
        console.log('Setting up mobile menu toggle...');
        const toggle = () => {
            console.log('Mobile menu toggle clicked');
            const isHidden = menu.classList.contains('hidden');
            if (isHidden) {
                menu.classList.remove('hidden');
                iconMenu.classList.add('hidden');
                iconClose.classList.remove('hidden');
                button.setAttribute('aria-expanded', 'true');
            } else {
                menu.classList.add('hidden');
                iconMenu.classList.remove('hidden');
                iconClose.classList.add('hidden');
                button.setAttribute('aria-expanded', 'false');
            }
        };

        button.addEventListener('click', toggle);
        console.log('Mobile menu toggle event listener added');
    } else {
        console.log('Mobile menu elements not found on this page');
    }

    // Password visibility toggles (works on any page)
    const toggleButtons = document.querySelectorAll('.password-toggle');
    console.log('Password toggle buttons found:', toggleButtons.length);
    
    toggleButtons.forEach((btn, index) => {
        console.log(`Setting up password toggle ${index + 1}:`, btn);
        btn.addEventListener('click', () => {
            console.log(`Password toggle ${index + 1} clicked`);
            const targetId = btn.getAttribute('data-target');
            if (!targetId) {
                console.log('No data-target found');
                return;
            }
            const input = document.getElementById(targetId);
            if (!input) {
                console.log(`Input with id '${targetId}' not found`);
                return;
            }

            const isPassword = input.getAttribute('type') === 'password';
            input.setAttribute('type', isPassword ? 'text' : 'password');
            console.log(`Password field type changed to: ${input.getAttribute('type')}`);

            const openIcon = btn.querySelector('svg[data-eye="open"]');
            const closedIcon = btn.querySelector('svg[data-eye="closed"]');
            if (openIcon && closedIcon) {
                openIcon.classList.toggle('hidden');
                closedIcon.classList.toggle('hidden');
                console.log('Icons toggled');
            } else {
                console.log('Icons not found:', { openIcon, closedIcon });
            }
        });
        console.log(`Password toggle ${index + 1} event listener added`);
    });
});
