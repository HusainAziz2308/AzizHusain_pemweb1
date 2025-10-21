// Basic script to create a minimal page and simple CSS/DOM interactions
document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;
    body.classList.add('js-enabled');
    body.style.margin = '0';
    body.style.fontFamily = 'system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial';
    body.style.lineHeight = '1.5';
    body.style.padding = '24px';
    body.style.backgroundColor = '#f7f7fb';
    body.style.color = '#111';

    const container = document.createElement('main');
    container.style.maxWidth = '720px';
    container.style.margin = '0 auto';
    container.style.padding = '24px';
    container.style.background = 'white';
    container.style.borderRadius = '8px';
    container.style.boxShadow = '0 6px 20px rgba(0,0,0,0.06)';
    container.style.fontSize = '16px';

    container.innerHTML = `
        <h1 style="margin-top:0">Basic Page</h1>
        <p>This is a minimal JavaScript-driven page to demonstrate simple DOM/CSS interactions.</p>
        <div id="controls" style="display:flex;gap:8px;flex-wrap:wrap"></div>
    `;

    body.appendChild(container);

    const controls = container.querySelector('#controls');

    const makeButton = (text, onClick) => {
        const b = document.createElement('button');
        b.type = 'button';
        b.textContent = text;
        b.style.padding = '8px 12px';
        b.style.border = '1px solid rgba(0,0,0,0.08)';
        b.style.background = '#fff';
        b.style.cursor = 'pointer';
        b.style.borderRadius = '6px';
        b.addEventListener('click', onClick);
        return b;
    };

    // Theme toggle
    let dark = false;
    const toggleTheme = () => {
        dark = !dark;
        if (dark) {
            body.style.backgroundColor = '#0f1724';
            body.style.color = '#e6eef8';
            container.style.background = '#0b1220';
            container.style.boxShadow = '0 8px 30px rgba(2,6,23,0.6)';
        } else {
            body.style.backgroundColor = '#f7f7fb';
            body.style.color = '#111';
            container.style.background = 'white';
            container.style.boxShadow = '0 6px 20px rgba(0,0,0,0.06)';
        }
    };

    controls.appendChild(makeButton('Toggle Theme', toggleTheme));

    // Font size controls
    const changeFont = (delta) => {
        const fs = parseFloat(getComputedStyle(container).fontSize);
        const next = Math.max(12, Math.min(28, fs + delta));
        container.style.fontSize = next + 'px';
    };
    controls.appendChild(makeButton('A+', () => changeFont(2)));
    controls.appendChild(makeButton('A−', () => changeFont(-2)));

    // Demo content
    const demo = document.createElement('div');
    demo.style.marginTop = '16px';
    demo.innerHTML = `
        <p><strong>Try it:</strong> change theme and font size using the buttons above.</p>
        <ul>
            <li>Accessible by keyboard</li>
            <li>Works without external CSS</li>
        </ul>
    `;
    container.appendChild(demo);
});