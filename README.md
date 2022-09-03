phpでメモ帳を作成(ノーフレームワーク)
参考教材：テックピット

cd docker_simple_memo_php

# 開発環境の立ち上げ
docker-compose -f .docker_memo/docker-compose.yml up -d

# 開発環境を止める
docker-compose -f .docker_memo/docker-compose.yml down


# 参考
https://github.com/YasuakiHirano/simple_memo
