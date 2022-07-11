// Sortable.jsを利用したドラッグ&ドロップ
window.onload = function () {
  let prefectureItems = document.getElementById('prefectureItems');
  Sortable.create(prefectureItems, {
    animation: 150,
    //   localStorageに保存
    group: "save",
    store: {
      get: function (sortable) {
        var order = localStorage.getItem(sortable.options.group.name);
        return order ? order.split('|') : [];
      },
      set: function (sortable) {
        var order = sortable.toArray();
        localStorage.setItem(sortable.options.group.name, order.join('|'));
      }
    }
  });
}
