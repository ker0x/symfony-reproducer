## Reproducer for [42075](https://github.com/symfony/symfony/issues/42075)

```bash
git clone git@github.com:ker0x/symfony-reproducer.git
cd symfony-reproducer
git co --track origin/bug/form-id-reproducer
composer install
symfony serve
```

**Default behavior:** https://127.0.0.1:8000/

**Partial workaround:** https://127.0.0.1:8000/workaround
