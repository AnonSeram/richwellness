<div class="language-switcher">
    <div class="dropdown">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="languageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-globe me-2"></i>
            @if(app()->getLocale() == 'id')
                <img src="https://flagcdn.com/w20/id.png" alt="ID" style="width: 20px; margin-right: 5px;">
                ID
            @else
                <img src="https://flagcdn.com/w20/us.png" alt="EN" style="width: 20px; margin-right: 5px;">
                EN
            @endif
        </button>
        <div class="dropdown-menu" aria-labelledby="languageDropdown">
            <a class="dropdown-item {{ app()->getLocale() == 'id' ? 'active' : '' }}" href="{{ route('language.switch', 'id') }}">
                <img src="https://flagcdn.com/w20/id.png" alt="ID" style="width: 20px; margin-right: 8px;">
                Bahasa Indonesia
            </a>
            <a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}" href="{{ route('language.switch', 'en') }}">
                <img src="https://flagcdn.com/w20/us.png" alt="EN" style="width: 20px; margin-right: 8px;">
                English
            </a>
        </div>
    </div>
</div>

<style>
.language-switcher .dropdown-item.active {
    background-color: #007bff;
    color: white;
}

.language-switcher .dropdown-item:hover {
    background-color: #f8f9fa;
}

.language-switcher .btn {
    border-radius: 20px;
    padding: 8px 16px;
}
</style>

