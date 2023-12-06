<?php

/**
 * OneBlockCurrent Model
 *
 * @copyright (c) 2022-2023 tatum.io
 * @license   MIT
 * @package   Tatum
 * @author    Mark Jivko
 * @link      https://tatum.io/
 *
 * NOTE: This class is auto-generated by tatum.io
 * Do not edit this file manually!
 */

namespace Tatum\Model;
!defined("TATUM-SDK") && exit();

/**
 * OneBlockCurrent Model
 */
class OneBlockCurrent extends AbstractModel {

    public const _D = null;
    protected static $_name = "OneBlockCurrent";
    protected static $_definition = [
        "shard_id" => ["shardID", "float", null, "getShardId", "setShardId", null, ["r" => 0]], 
        "block_number" => ["blockNumber", "float", null, "getBlockNumber", "setBlockNumber", null, ["r" => 0]]
    ];

    /**
     * OneBlockCurrent
     *
     * @param mixed[] $data Model data
     */
    public function __construct(array $data = []) {
        foreach(static::$_definition as $k => $v) {
            $this->_data[$k] = isset($data[$k]) ? $data[$k] : $v[5];
        }
    }


    /**
     * Get shard_id
     *
     * @return float|null
     */
    public function getShardId(): ?float {
        return $this->_data["shard_id"];
    }

    /**
     * Set shard_id
     * 
     * @param float|null $shard_id Shard ID
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setShardId(?float $shard_id) {
        return $this->_set("shard_id", $shard_id);
    }

    /**
     * Get block_number
     *
     * @return float|null
     */
    public function getBlockNumber(): ?float {
        return $this->_data["block_number"];
    }

    /**
     * Set block_number
     * 
     * @param float|null $block_number Current block number in this shard
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setBlockNumber(?float $block_number) {
        return $this->_set("block_number", $block_number);
    }
}
