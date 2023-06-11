## Reproducer for [50628](https://github.com/symfony/symfony/issues/50628)

```bash
git clone git@github.com:ker0x/symfony-reproducer.git
cd symfony-reproducer
git co --track origin/bug/issue-50628
composer install
yarn install --force
yarn dev
symfony serve
```

Fo to the main page, select one or more value in the select, then focus on an other field to trigger the error.
