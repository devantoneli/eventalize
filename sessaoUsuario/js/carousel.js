const slides = Array.from(document.querySelectorAll("[data-slide]"));
const buttons = Array.from(document.querySelectorAll("[data-button]"));

let currSlideIndex = 0;
const maxSlideIndex = slides.length - 1;

const updateCarousel = (slideIndex = 0) => {
  slides.forEach((slide, index) => {
    const slideOffset = (index - slideIndex) * 120;
    slide.style.transform = `translateX(${slideOffset}%)`;
  });
};

const handleButtonClick = (event) => {
  const isNextButton = event.target.dataset.button === "next";
  currSlideIndex = isNextButton ? currSlideIndex + 1 : currSlideIndex - 1;

  if (currSlideIndex > maxSlideIndex) {
    currSlideIndex = 0;
  } else if (currSlideIndex < 0) {
    currSlideIndex = maxSlideIndex;
  }

  updateCarousel(currSlideIndex);
};

buttons.forEach((button) => {
  button.addEventListener("click", handleButtonClick);
});

updateCarousel(currSlideIndex);