<div class="container hero <% if $StyleVariant %> hero--$StyleVariant<% end_if %>">
    <div class="hero__content">
        <% if $ShowTitle %>
            <% include ElementTitle %>
        <% end_if %>
        <% if HTML %>
            $HTML
        <% end_if %>
    </div>
    <% if $Buttons.count %>
        <div class="hero__buttonlist">
            Buttons
        </div>
    <% end_if %>
</div>
