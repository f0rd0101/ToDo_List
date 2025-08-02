<button style="
  background-color: #4bad4f;
  border-radius: 6px;
  padding: 8px 16px;
  border: none;
  color: white;
  font-weight: 600;
  cursor: pointer;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 2px 6px rgba(75, 173, 79, 0.4);
"
  onmouseover="this.style.backgroundColor='#3a8c3f'; this.style.boxShadow='0 4px 12px rgba(58, 140, 63, 0.6)';"
  onmouseout="this.style.backgroundColor='#4bad4f'; this.style.boxShadow='0 2px 6px rgba(75, 173, 79, 0.4)';"
>
  {{ $slot }}
</button>
