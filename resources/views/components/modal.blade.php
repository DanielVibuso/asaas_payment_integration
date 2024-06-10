<!-- Modal -->
<div class="modal fade" id="{{ $modalId }}" data-bs-backdrop="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="{{ $modalLabelId }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="{{ $modalLabelId }}">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      {{ $slot }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">voltar</button>
      </div>
    </div>
  </div>
</div>