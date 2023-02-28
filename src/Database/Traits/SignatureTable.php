<?php

namespace nguyenanhung\Frontend\Your_Project\Database\Traits;

/**
 * Trait SignatureTable
 *
 * @package   nguyenanhung\Frontend\Your_Project\Database\Traits
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
trait SignatureTable
{
    /**
     * Function getUserSignature
     *
     * @param $nickname
     * @param $role
     *
     * @return array|bool|\Illuminate\Support\Collection|mixed|object|string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 28/02/2023 50:21
     */
    public function getUserSignature($nickname = '', $role = null)
    {
        $table = 'data_signature';
        $cacheKey = $this->cachePrefix . __FUNCTION__ . hash('md5', $table . $nickname . $role);
        if ($this->cache->has($cacheKey)) {
            $result = $this->cache->get($cacheKey);
        } else {
            $DB = $this->connection();
            $wheres = array();
            $wheres['nickname'] = array('field' => 'nickname', 'operator' => $DB::OPERATOR_EQUAL_TO, 'value' => $nickname);
            $wheres['status'] = array('field' => 'status', 'operator' => $DB::OPERATOR_EQUAL_TO, 'value' => 1);
            if ($role !== null) {
                $wheres['status'] = array('field' => 'role', 'operator' => $DB::OPERATOR_EQUAL_TO, 'value' => $role);
            }
            $select = array('nickname', 'signature', 'role');
            $result = $DB->setTable($table)->getInfo($wheres, 'id', null, $select);
            $this->cache->save($cacheKey, $result);
            $DB->disconnect();
            unset($DB);
        }

        return $result;
    }
}
