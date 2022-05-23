<div class="container content <% if $StyleVariant %> content--$StyleVariant<% end_if %>">
    <% if $ShowTitle %>
      <% include ElementTitle %>
    <% end_if %>
    <% if $HTML %>
        $HTML
    <% end_if %>
</div>
