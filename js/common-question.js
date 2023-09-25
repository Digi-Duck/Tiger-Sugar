function toggleDownArea(qaId) {
  const qa = document.querySelector(qaId);
  const downArea = document.querySelector(`${qaId}+.qa-area .down-area`);
  
  qa.addEventListener('click', () => {
    if (!downArea.classList.contains('show') && !downArea.classList.contains('hidden')) {
      downArea.classList.add("show");
    } else if (downArea.classList.contains('show') && !downArea.classList.contains('hidden')) {
      downArea.classList.remove("show");
      downArea.classList.add("hidden");
    } else {
      downArea.classList.add("show");
      downArea.classList.remove("hidden");
    }
  });
}

toggleDownArea('#qa1');
toggleDownArea('#qa2');
toggleDownArea('#qa3');
toggleDownArea('#qa4');
toggleDownArea('#qa5');
toggleDownArea('#qa6');
toggleDownArea('#qa7');
toggleDownArea('#qar2');
toggleDownArea('#qar4');
toggleDownArea('#qar6');