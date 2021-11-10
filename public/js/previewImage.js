function previewImage() {
    const image = document.querySelector('#image');
    const imagePreview = document.querySelector('.img-preview');

    imagePreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imagePreview.src = oFREvent.target.result;
    }
}

function previewImageSatu() {
  const image = document.querySelector('#image_1');
  const imagePreview = document.querySelector('.img-preview-satu');

  imagePreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent) {
    imagePreview.src = oFREvent.target.result;
  }
}

function previewImageDua() {
  const image = document.querySelector('#image_2');
  const imagePreview = document.querySelector('.img-preview-dua');

  imagePreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent) {
    imagePreview.src = oFREvent.target.result;
  }
}

function previewImageTiga() {
  const image = document.querySelector('#image_3');
  const imagePreview = document.querySelector('.img-preview-tiga');

  imagePreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent) {
    imagePreview.src = oFREvent.target.result;
  }
}

function previewImageEmpat() {
  const image = document.querySelector('#image_4');
  const imagePreview = document.querySelector('.img-preview-empat');

  imagePreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent) {
    imagePreview.src = oFREvent.target.result;
  }
}