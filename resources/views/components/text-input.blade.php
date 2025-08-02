@props(['disabled' => false])
<input
{{ $attributes }} 
@disabled($disabled)
 
  style="
    border: 1px solid #a0aec0; /* серый цвет по умолчанию */
    background-color: transparent;
    color: #a0aec0;
    border-radius: 6px;
    box-shadow: none;
    padding: 0.375rem 0.75rem;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    cursor: pointer;
    transition: border-color 0.2s ease, box-shadow 0.2s ease, color 0.2s ease;
  "
  onfocus="this.style.borderColor='#22c55e'; this.style.boxShadow='0 0 5px #22c55e'; this.style.color='#22c55e';"
  onblur="this.style.borderColor='#a0aec0'; this.style.boxShadow='none'; this.style.color='#a0aec0';"
  onmouseover="this.style.borderColor='#22c55e'; this.style.boxShadow='0 0 5px #22c55e'; this.style.color='#22c55e';"
  onmouseout="if(document.activeElement !== this){ this.style.borderColor='#a0aec0'; this.style.boxShadow='none'; this.style.color='#a0aec0'; }"

>
