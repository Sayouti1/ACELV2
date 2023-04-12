const nextBtns = document.getElementById("pre-next");
const prevBtns = document.getElementById("pre-prev");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;
console.log(nextBtns.length);

const progressActive = document.querySelectorAll(".progress-step-active");
progress.style.width = ((progressActive.length) / (progressSteps.length)) * 100 + '%';

nextBtns.addEventListener("click", () => {
        
    formStepsNum++;
    updateFormSteps();
    updateProgressBar();
});

prevBtns.addEventListener("click", () => {
        
    formStepsNum--;
    updateFormSteps();
    updateProgressBar();
});

function updateFormSteps() {
    formSteps.forEach((formStep) => {
        formStep.classList.contains("form-step-active") &&
            formStep.classList.remove("form-step-active");
    });

    formSteps[formStepsNum].classList.add("form-step-active")
}

function updateProgressBar() {
    progressSteps.forEach((progressStep, idx) => {
        if (idx < formStepsNum + 1) {
            progressStep.classList.add("progress-step-active");
        } else {
            progressStep.classList.remove("progress-step-active");
        }
    });

    
    const progressActive2 = document.querySelectorAll(".progress-step-active");
    console.log(progressActive.length);
    console.log(progressSteps.length);
    progress.style.width = ((progressActive2.length) / (progressSteps.length)) * 100 + '%';
}

