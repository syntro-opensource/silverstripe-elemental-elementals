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
            <% loop Buttons %>
                <% if Link %>
                    <% with Link %>
                    <a {$IDAttr} href="{$LinkURL}" class="btn btn-$Up.Style m-2" {$TargetAttr}>$Title</a>
                    <% end_with %>
                <% end_if %>
            <% end_loop %>
        </div>
    <% end_if %>
</div>
