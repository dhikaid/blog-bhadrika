// Temukan elemen dengan class trix-content
var trixContent = document.querySelector(".trix-content");

// Temukan semua elemen <ul> di dalam trix-content
var ulElements = trixContent.querySelectorAll("ul");

// Tambahkan kelas "list-descimal" ke setiap elemen <ul>
ulElements.forEach(function (ulElement) {
  ulElement.classList.add("list-disc");
});

// Temukan semua elemen <ol> di dalam trix-content
var olElements = trixContent.querySelectorAll("ol");

// Tambahkan kelas "list-dol" ke setiap elemen <ol>
olElements.forEach(function (olElement) {
  olElement.classList.add("list-decimal");
});
