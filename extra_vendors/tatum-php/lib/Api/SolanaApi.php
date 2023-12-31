<?php

/**
 * Implementation of Solana API
 *
 * @copyright (c) 2022-2023 tatum.io
 * @license   MIT
 * @package   Tatum
 * @author    Mark Jivko
 *
 * NOTE: This class is auto-generated by tatum.io
 * Do not edit this file manually!
 */

namespace Tatum\Api;
!defined("TATUM-SDK") && exit();

use InvalidArgumentException as IAE;
use Tatum\Sdk\Serializer as S;

/**
 * API for Solana
 */
class SolanaApi extends AbstractApi {
    
    /**
     * API package
     */
    const PKG = "Solana";

    /**
     * Broadcast and confirm signed Solana transaction
     *
     * @param \Tatum\Model\SolanaBroadcastConfirm $solana_broadcast_confirm 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\SolanaTransactionHashWithConfirm
     */
    public function solanaBroadcastConfirm($solana_broadcast_confirm) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/solana/broadcast/confirm";
        /** @var \Tatum\Model\SolanaTransactionHashWithConfirm $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $solana_broadcast_confirm
            ), 
            "\Tatum\Model\SolanaTransactionHashWithConfirm"
        );
            
        return $result;
    }
    
    /**
     * Generate Solana wallet
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\SolanaWallet
     */
    public function solanaGenerateWallet() {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/solana/wallet";
        /** @var \Tatum\Model\SolanaWallet $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", $rPath, $rPath, [], $rHeaders, []
            ), 
            "\Tatum\Model\SolanaWallet"
        );
            
        return $result;
    }
    
    /**
     * Get Solana Account balance
     *
     * @param string $address Account address you want to get balance of
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\SolBalance
     */
    public function solanaGetBalance($address) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/solana/account/balance/{address}";
        /** @var \Tatum\Model\SolBalance $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", S::parse($rPath, ["address" => $address]), $rPath, [], $rHeaders, []
            ), 
            "\Tatum\Model\SolBalance"
        );
            
        return $result;
    }
    
    /**
     * Get Solana block by number
     *
     * @param float $height Block number
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\SolanaBlock
     */
    public function solanaGetBlock($height) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/solana/block/{height}";
        /** @var \Tatum\Model\SolanaBlock $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", S::parse($rPath, ["height" => $height]), $rPath, [], $rHeaders, []
            ), 
            "\Tatum\Model\SolanaBlock"
        );
            
        return $result;
    }
    
    /**
     * Get current block number
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return float
     */
    public function solanaGetCurrentBlock() {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/solana/block/current";
        /** @var float $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", $rPath, $rPath, [], $rHeaders, []
            ), 
            "float"
        );
            
        return $result;
    }
    
    /**
     * Get Solana Transaction
     *
     * @param string $hash Transaction hash
     * @param string|null $commitment Commitment of the transaction. If not defined, all transactions are being scanned.
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\SolanaTx
     */
    public function solanaGetTransaction($hash, $commitment = null) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], []);

        // Path template
        $rPath = "/v3/solana/transaction/{hash}";
        /** @var \Tatum\Model\SolanaTx $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "GET", S::parse($rPath, ["hash" => $hash]), $rPath, [
                    "commitment" => isset($commitment) ? S::toQueryValue($commitment) : null,
                ], $rHeaders, []
            ), 
            "\Tatum\Model\SolanaTx"
        );
            
        return $result;
    }
    
    /**
     * Send SOL from account to account
     *
     * @param \Tatum\Model\TransferSolanaBlockchain $transfer_solana_blockchain 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\TransactionSigned
     */
    public function transferSolanaBlockchain($transfer_solana_blockchain) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/solana/transaction";
        /** @var \Tatum\Model\TransactionSigned $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $transfer_solana_blockchain
            ), 
            "\Tatum\Model\TransactionSigned"
        );
            
        return $result;
    }
    
    /**
     * Send SOL from account to account
     *
     * @param \Tatum\Model\TransferSolanaBlockchainKMS $transfer_solana_blockchain_kms 
     * @throws \Tatum\Sdk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * 
     * @return \Tatum\Model\TransactionSigned
     */
    public function transferSolanaBlockchainKMS($transfer_solana_blockchain_kms) {
        $rHeaders = $this->_headerSelector->selectHeaders(["application/json"], ["application/json"]);

        // Path template
        $rPath = "/v3/solana/transaction";
        /** @var \Tatum\Model\TransactionSigned $result */
        $result = $this->exec(
            S::createRequest(
                $this->_caller->config(), self::PKG, "POST", $rPath, $rPath, [], $rHeaders, [], $transfer_solana_blockchain_kms
            ), 
            "\Tatum\Model\TransactionSigned"
        );
            
        return $result;
    }
    
}
