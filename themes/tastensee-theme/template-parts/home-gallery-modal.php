<?php
/** Gallery dialog. @package TasteNsee */
?>
    <dialog class="gallery-modal" id="gallery-modal" aria-labelledby="gallery-modal-title">
      <div class="gallery-modal__content">
        <div class="gallery-modal__header">
          <div>
            <p class="gallery-modal__category" data-gallery-modal-category></p>
            <h2 class="gallery-modal__title" id="gallery-modal-title"></h2>
          </div>
          <button class="gallery-modal__close" type="button" aria-label="Close photo" autofocus>
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <img class="gallery-modal__image" data-gallery-modal-image alt="" />
      </div>
    </dialog>

