<div class="modal fade" id="showPartnerModal" tabindex="-1" role="dialog" aria-labelledby="showPartnerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showPartnerModalLabel">Просмотр партнера</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 text-center mb-3">
                        <img src="{{ asset('storage/' . $partner->logo) }}"
                            alt="{{ $partner->name }}"
                            class="img-thumbnail"
                            style="max-width: 100%; height: auto;">
                    </div>
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th style="width: 150px;">ID:</th>
                                    <td>{{ $partner->id }}</td>
                                </tr>
                                <tr>
                                    <th>Название:</th>
                                    <td>{{ $partner->name }}</td>
                                </tr>
                                <tr>
                                    <th>URL:</th>
                                    <td>
                                        @if($partner->url)
                                        <a href="{{ $partner->url }}" target="_blank" class="text-dark">
                                            {{ $partner->url }} <i class="fas fa-external-link-alt"></i>
                                        </a>
                                        @else
                                        <span class="text-muted">Не указан</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Создано:</th>
                                    <td>{{ $partner->created_at->format('d.m.Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Обновлено:</th>
                                    <td>{{ $partner->updated_at->format('d.m.Y H:i') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>