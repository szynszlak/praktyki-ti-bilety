document.getElementById('tab-login').addEventListener('click', ()=>showPanel('login'));
document.getElementById('tab-register').addEventListener('click', ()=>showPanel('register'));

function showPanel(name) {
  ['login','register'].forEach(p => {
    const el = document.getElementById('panel-' + p);
    el.style.display = 'none';
  });
  const target = document.getElementById('panel-' + name);
  target.style.display = 'block';
  target.classList.remove('fade-in');
  void target.offsetWidth;
  target.classList.add('fade-in');

  ['login','register'].forEach(t => {
    const tab = document.getElementById('tab-' + t);
    if (tab) tab.classList.toggle('active', t === name);
  });
}

function togglePass(id, btn) {
  const input = document.getElementById(id);
  const isText = input.type === 'text';
  input.type = isText ? 'password' : 'text';
  const prefix = id === 'pass-login' ? 'eye-login' : 'eye-reg';
  document.getElementById(prefix + '-show').style.display = isText ? '' : 'none';
  document.getElementById(prefix + '-hide').style.display = isText ? 'none' : '';
}